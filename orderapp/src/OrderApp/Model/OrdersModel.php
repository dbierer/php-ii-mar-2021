<?php
namespace OrderApp\Model;
use OrderApp\Core\Db\{ModelException, AbstractModel};
use PDO;
use PDOException;
/**
 * Orders Db Table Class
 */
class OrdersModel extends AbstractModel
{
    const MSG_ORDER_ADD = 'Order Added';
    const MSG_ORDERS_RELOADED = 'Orders Reloaded';
    const TABLE = 'orders';

    //Map the properties to the table columns
    protected $id = 'id';
    protected $date = 'date';
    protected $status = 'status';
    protected $amount = 'amount';
    protected $desc = 'description';
    protected $customerId = 'customer';

    /**
     * @param array $data
     * @return array|null
     * @internal param null $orderBy
     * @internal param null $orderId
     * @internal param null $orderStatus
     */
    public function getOrders(array $data)
    {
        $orderBy = $this->getOrderBy($data);
        $where = $this->getWhere($data);

        // Build the query string
        $query = sprintf("SELECT orders.*, CONCAT(firstname, ' ' , lastname) AS customer_name
                    FROM %s
                    LEFT JOIN customers ON customers.id = ?
                    %s %s", static::TABLE, $where, $orderBy);

        try {
            // Set the query, retrieve and process the results
            $stmt = $this->db->pdo->prepare($query);
            if ($stmt->execute([$this->customerId])) {
                // Empty array ready to fill with data
                $orders = [];

                // Variable to store grand total of order amounts
                $totalValue = 0;

                // Each row comes in as an associative array, with the keys named the same as the db fields
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    // Add one more element to the row array -- a field for the formatted date
                    $row['formatted_date'] = date('M d, Y', strtotime($row[$this->date]));

                    // Capitalize the status name
                    $row['formatted_status'] = ucfirst($row[$this->status]);

                    // add the whole row to the orders array
                    $orders[] = $row;
                    $totalValue += $row['amount'];
                }
            } else {
                throw new ModelException('Query error');
            }
        } catch (ModelException | PDOException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, static::ERROR_LOG);
        }

        // return data as array with 2 elements: 1. orders: array of orders 2. total: total value of all orders
        if (isset($orders) && isset($totalValue)) {
            return [
                'orders' => $orders,
                'total' => $totalValue,
            ];
        }

        //If nothing else...
        return false;
    }

    /**
     * @param $data
     * @return string
     */
    protected function getOrderBy(array $data){
        $orderBy = '';
        if($data['order-by']){
            switch(true){
                case ($data['order-by'] == 'date') :
                    return " ORDER BY $this->date";
                    break;
                case ($data['order-by'] == 'amount') :
                    return " ORDER BY $this->amount";
                    break;
                case ($data['order-by'] == 'order_status') :
                    return " ORDER BY $this->status";
                    break;
                case ($data['order-by'] == 'customer') :
                   return " ORDER BY $this->customerId";
                    break;
                default:
                    return" ORDER BY $this->id";
            }
        }
        return $orderBy;
    }

    /**
     * @param $data
     * @return string
     */
    protected function getWhere(array $data){
        // Set up an empty where to contain the where clause
        $where = '';

        // Is a specific id requested?
        if (!empty($data['order-num-filter'])){
            $where .= sprintf(' WHERE orders.id = %d ', $data['order-num-filter']);
        }

        // Is a specific status requested?
        if (!empty($data['status-filter']) && $data['status-filter'] !== 'all') {
            if ($where) { // if there's already something in the WHERE clause, add to it
                $where .= sprintf(" AND $this->status = '%s' ", $data['status-filter']);
            } else {
                $where .= sprintf(" WHERE $this->status = '%s' ", $data['status-filter']);
            }
        }
        return $where;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data)
    {
        $customer = $data['customer'];
        $data = $data['data'];

        //build the INSERT query
        $query = sprintf("INSERT INTO %s ($this->date, $this->status, $this->amount, $this->desc, $this->customerId) VALUES ('%s', '%s', '%d', '%s', '%d')",
            static::TABLE,
            $data['order_date'],
            $data['status_filter'],
            $data['amount'],
            $data['description'],
            $data['cust_id']);

        //Save the data
        try {
            // Set the query, retrieve and process the results
            if (!$this->db->pdo->exec($query)) {
                throw new ModelException('Query error');
            }
        } catch (ModelException | PDOException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, static::ERROR_LOG);
            return false;
        }
        //On success ...
        return true;
    }
}
