<div class="center">
    <table class="simple-little-table" cellspacing='0'>
        <tr><th>ID</th><th>Имя</th><th>д/р</th><th>Должность</th><th>Отдел</th><th>Тип з/п</th><th>З/п месяц</th></tr>    
    <?php        
        foreach ($data as $empoyer) {
            $emp = $empoyer['employe'];
            $pos = $empoyer['pos'];
            $dept = $empoyer['dept'];
            echo '<tr>';
            echo "<th>$emp->employeId</th><th>$emp->employeName</th>"
                    . "<th>$emp->employeBirthday</th>"
                    . "<th><a href='/position/id/" . $emp->employePos . "'>$pos</a></th>"
                    . "<th><a href='/dept/id/" . $emp->employeDept . "'>$dept</a></th>"
                    . "<th>$emp->employeSalary</th>"
                    . "<th>$emp->monthPay</th>";
            echo '</tr>';
        }
        echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th><th><a href='/index'>Взад</a></th></tr>";
    ?>
    </table>    
</div>
