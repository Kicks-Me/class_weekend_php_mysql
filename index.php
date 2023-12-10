<?php 
    include_once("./include/header.php");
    include_once("./config/dbContext.conf.php");

    $sql = "SELECT*FROM tbEmployees WHERE 1=1 ORDER BY LASTUPDATE";

    $result = connectDb()->query($sql);
?>
    <div class="col-12 col-lg-9 my-3 mx-auto">
        <div class="d-flex justify-content-between align-items-center px-3 py-2">
            <h3>ສະແດງລາຍການຂໍ້ມູນພະນັກງານ</h3>
            <a href="./addEmployees.php" class="btn btn-success px-4"><i class="fa-solid fa-plus"></i> &nbsp;ເພີ່ມໃໝ່</a>
        </div>
        <hr/>
        <div class="m-0 p-0 overflow-scroll">
            <table id="tbEmployees" class="table table-striped table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ລະຫັດ</th>
                        <th scope="col">ຊື່ & ນາມະກຸນ</th>
                        <th scope="col">ວ.ດ.ປເກິດ</th>
                        <th scope="col">ອາຍຸ</th>
                        <th scope="col">ອີເມລ໌</th>
                        <th scope="col">ເບີໂທ</th>
                        <th scope="col">ສະຖານະ</th>
                        <th scope="col" class="text-center" style="min-width: 150px;">ດໍາເນິນການ</th>
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                       
                        if($result->num_rows > 0)
                        {
                            $index = 0;

                            foreach($result as $row)
                            {
                                $index ++;
                                ?>
                                    <tr>
                                        <td scope="col"><?php echo $index; ?></td>
                                        <td><?php echo $row["empid"] ?></td>
                                        <td><?php echo $row["name"]." ". $row["surname"]; ?></td>
                                        <td><?php echo $row["birthday"]; ?></td>
                                        <td><?php echo $row["age"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td><?php echo $row["mobile"]; ?></td>
                                        <td><?php echo $row["Flag"] == "1" ? "Active" : "InActive"; ?></td>
                                        <td>
                                            <div class="d-inline-flex input-group m-auto text-center">
                                                <div class="m-auto">
                                                <a onclick="return confirm('Are you sure to edit?');" href="./addEmployees.php?id=<?php echo $row['id']; ?>" class="btn btn-warning text-center"><i class="fa-solid fa-pencil"></i></a>
                                                
                                                <a onclick="return confirm('Are your sure to delete?');" href="./controllers/deleteEmployees.php?id=<?php echo $row['id']; ?>" class="btn btn-danger text-center"><i class="fa-solid fa-trash-can"></i></a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php include('./include/footer.php');?>