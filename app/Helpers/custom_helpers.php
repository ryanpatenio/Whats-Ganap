<?php
use Illuminate\Support\Facades\DB;


if (!function_exists('json_message')) {
    /**
     * Return a formatted JSON response.
     *
     * @param string $message
     * @param int $status
     * @param array $data
     * @return \Illuminate\Http\JsonResponse
     */
    function json_message($message, $status = 200,$code, $data = [])
    {
        return response()->json([
            'message' => $message,
            'status' => $status,
            'code' => $code,
            'data' => $data,
        ], $status);
    }
}

//Using Query Builder
    if (!function_exists('query_builder')) {
        /**
         * Run a query using Laravel's Query Builder.
         *
         * @param string $query_type
         * @param string $table
         * @param array|null $data
         * @param array|null $conditions
         * @return mixed
         * @throws Exception
         */

         /**
           
        *USING SELECT

          * $users = run_query_builder('SELECT', 'users', null, ['email' => 'test@example.com']);

        *INSERT
          * $insert = run_query_builder('INSERT', 'users', [
           *  'name' => 'John Doe',
           *  'email' => 'john@example.com',
           *     ]);
           * echo $insert['insert_id'];
           * 
           
        *USING UPDATE
           * $update = run_query_builder('UPDATE', 'users', [
           *    'name' => 'Jane Doe',
           *     ], ['id' => 1]);
           *     echo $update['affected_rows'];
            
        *USING DELETE
           * $delete = run_query_builder('DELETE', 'users', null, ['id' => 1]);
           *    echo $delete['deleted_rows'];



          */
        function query_builder($query_type, $table, $data = null, $conditions = null)
        {
            try {
                switch (strtoupper($query_type)) {
                    case 'SELECT':
                        $query = DB::table($table);
                        if ($conditions) {
                            foreach ($conditions as $field => $value) {
                                $query->where($field, $value);
                            }
                        }
                        return $query->get()->toArray();
    
                    case 'INSERT':
                        $insert_id = DB::table($table)->insertGetId($data);
                        return ['insert_id' => $insert_id];
    
                    case 'UPDATE':
                        $query = DB::table($table);
                        if ($conditions) {
                            foreach ($conditions as $field => $value) {
                                $query->where($field, $value);
                            }
                        }
                        $affected_rows = $query->update($data);
                        return ['affected_rows' => $affected_rows];
    
                    case 'DELETE':
                        $query = DB::table($table);
                        if ($conditions) {
                            foreach ($conditions as $field => $value) {
                                $query->where($field, $value);
                            }
                        }
                        $deleted_rows = $query->delete();
                        return ['deleted_rows' => $deleted_rows];
    
                    default:
                        throw new Exception("Unsupported query type: $query_type");
                }
            } catch (Exception $e) {
                // Log or handle the exception
                return ['error' => $e->getMessage()];
            }
        }
    }

    // using  RAW SQL QUERIES
    if (!function_exists('run_query')) {
        /**
         * Run a custom query with parameters.
         *
         * @param string $query
         * @param array|null $params
         * @return mixed
         * @throws Exception
         */
        function run_query($query, $params = null)
        {
            // Determine the query type
            $query_type = strtoupper(substr(trim($query), 0, 6));
    
            try {
                switch ($query_type) {
                    case 'SELECT':
                        $result = DB::select($query, $params);
                        return json_decode(json_encode($result), true); // Return as an array
    
                    case 'INSERT':
                        DB::insert($query, $params);
                        $insert_id = DB::getPdo()->lastInsertId();
                        return ['insert_id' => $insert_id];
    
                    case 'UPDATE':
                        $affected = DB::update($query, $params);
                        return ['affected_rows' => $affected];
    
                    case 'DELETE':
                        $deleted = DB::delete($query, $params);
                        return ['deleted_rows' => $deleted];
    
                    default:
                        throw new Exception("Unsupported query type: $query_type");
                }
            } catch (Exception $e) {
                // Log or handle the exception
                return ['error' => $e->getMessage()];
            }
        }
    }