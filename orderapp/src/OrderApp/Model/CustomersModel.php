<?php
namespace OrderApp\Model;
use OrderApp\Core\Db\{ModelException, AbstractModel};
use PDO;

/**
 * Customers Db Table Class
 */
class CustomersModel extends AbstractModel
{
    const TABLE = 'customers';

    //Map the properties to the table columns
    protected $id = 'id';
    protected $firstname = 'firstname';
    protected $lastname = 'lastname';

    /**
     * @param int $id
     * @return bool
     */
    public function getCustomer(int $id): array|bool
    {
        //Initialize a statement
        $stmt = null;
		$result = [];
		
        // Build a query
        $query = "SELECT * FROM " . static::TABLE . " WHERE 'id' = $id";

        try{
            $stmt = $this->db->pdo->query($query);
			if (!empty($stmt))
				$result = $stmt->fetch(PDO::FETCH_ASSOC);
				if ($result === FALSE)
					throw new ModelException('Query error: No customer returned');
        } catch (ModelException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, static::ERROR_LOG);
        }

        return $result;
    }

    /**
     * @return array|bool
     */
    public function getCustomers(): array
    {
        //Initialize a statement
        $stmt = null;

        // Build a query
        $query = "SELECT id, CONCAT({$this->lastname},', ', {$this->firstname}) AS customer_name " . "FROM " . static::TABLE . " ORDER BY {$this->lastname}";

        try {
            if ($stmt = $this->db->pdo->query($query)) {

                // Provide empty array to hold the results
                $customers = [];

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { // Fetch row content
                    $customers[] = $row; // Populate the customers array
                }
                if (!empty($customers)) {
                    return $customers;
                }

                //If we haven't returned anything by now, return false
                return false;
            } else {
                throw new ModelException('Query error');
            }
        } catch (ModelException $e) {
            //Append the error to the defined log
            error_log($e->getMessage(), 3, static::ERROR_LOG);
        }
    }
}
