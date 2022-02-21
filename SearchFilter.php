
                <?php
                    include 'process.php';
                    include 'php.php';
                    $search = $_POST['search'];
                    $searchType = $_POST['searchType'];
                    if($search != ""){
                        if($searchType == "id"){
                            $sql = "select * from `data` WHERE id='$search';";
                        }
                        elseif($searchType == "FirstName"){
                            $sql = "select * from `data` WHERE first_name='$search';";
                        }
                        elseif($searchType == "LastName"){
                            $sql = "select * from `data` WHERE last_name='$search';";
                        }
                        else{
                            $sql = "select * from `data`WHERE departement='$search';";
                        }
                    }
                    else{
                        $sql = "select * from `data`";
                    }
                    $result = mysqli_query($mysqli, $sql);
                    $resultCheck = mysqli_num_rows($result);

                    if ($resultCheck > 0){
                        while ($row = mysqli_fetch_assoc($result)){ 
                ?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['FirstName'];?></td>
                    <td><?php echo $row['LastName'];?></td>
                    <td><?php echo $row['date'];?></td>
                    <td><?php echo $row['departement'];?></td>
                    <td><?php echo $row['salary'];?></td>
                    <td><?php echo $row['fonction'];?></td>
                    <td><?php echo '<a class="picture" href="'. $row['picture'] .'">Picture</a>';?></td>
                    <td><?php echo '<a class="modify" href="modify.php?id='. $row['id'] .'"><b>modify</b></a>';?></td>
                    <td><?php echo '<a class="delete" href="delete.php?id='. $row['id'] .'"><b>delete</b></a>';?></td>
                </tr>
                <?php
					    }
                    }
				?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>