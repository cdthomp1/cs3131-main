<label for="tech">Who would you like to work on your car? </label><select id="tech" name="tech">
                <?php
                foreach ($db->query("SELECT * FROM employees WHERE employee_position='Technician'") as $row) {
                    echo '<option value="' . $row['employee_name'] . '">' . $row['employee_name'] . '</option>';
                }
                ?>
            </select><br />

