<label for="tech">Who would you like to work on your car? </label><select id="tech" name="tech">
                <?php
                foreach ($db->query("SELECT * FROM employees WHERE employee_position='Technician'") as $row) {
                    echo '<option value="' . $row['employee_name'] . '">' . $row['employee_name'] . '</option>';
                }
                ?>
            </select><br />



            /* $sql = "SELECT appointment_date FROM appointment where appointment_date > '2020-03-23'";
                
                $sth = $db->query($sql);
                $result = $sth->fetchAll(PDO::FETCH_ASSOC);

                $rows = $sth->rowCount();

                if ($rows > 1) {
                    echo "PASSED IF STATEMENT";
                    foreach($result as $res) {
                        echo "<p>" . $res["appointment_date"] . "</p>";
                    }
                } else {
                    echo "FAILED IF STATEMENT";

                    echo $result['appointment_date'];                    
                } */