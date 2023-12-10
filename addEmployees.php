<?php 
    include("./include/header.php");
    include_once("./config/dbContext.conf.php");

        if(isset($_GET["id"]))
        {
            $sql = "SELECT*FROM tbEmployees WHERE ID=". $_GET["id"];

            $resultEdit = connectDb()->query($sql);

            if($resultEdit->num_rows !== 1)
            {
                echo "<script>alert('Not found data to edit.');</script>";
                header("refresh: 0, index.php");
            }

            $data = $resultEdit->fetch_assoc();
        }


    $color = "";
    $msg = "";

    if(isset($_GET["errType"]) && isset($_GET["msg"]))
    {
        // if($_GET["errType"] == "O")
        // {
        //     $color = "green";
        // }
        // elseif($_GET["errType"] == "W")
        // {
        //     $color = "gold";
        // }
        // else
        // {
        //     $color = "red";
        // }

        $color = $_GET["errType"] == "O" ? "green" : ($_GET["errType"] == "W" ? "gold" : "red");

        if($_GET["msg"] == "Success")
        {
            $msg = "Add data successfully!";
            header("refresh:2, index.php");
        }
        elseif($_GET["msg"] == "Empty")
        {
            $msg = "Fields is not supplied";
        }
        elseif($_GET["msg"] == "error")
        {
            $msg="Saving data error at sql syntax";
        }
        elseif($_GET["msg"] == "Updated")
        {
            $msg = "Update data successfully!";
            header("refresh:2, index.php");
        }
    }
?>

<div class="col-12 col-md-7 mx-auto">
    <form action="./controllers/employees.control.php" method="post">
        <div class="row justify-content-center">
            <h3 class="text-center pt-3">ໜ້າເພີ່ມຂໍ້ມູນພະນັກງານ</h3>
            <hr />
            <input type="hidden" name="txtId" id="txtId" value="<?php  if(isset($_GET["id"])) {echo $_GET["id"];} ; ?>">
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="empid">ລະຫັດພະນັງການ</label>
                <input type="text" class="form-control" name="empid" id="empid" value="<?php if(isset($data['empid'])){echo $data["empid"];} ?>" required placeholder="ປ້ອນລະຫັດພະນັກງານ">
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="txtName">ຊື່ແທ້</label>
                <input type="text" class="form-control" name="txtName" id="txtName" value="<?php if(isset($data['name'])){ echo $data["name"];} ?>" required placeholder="ປ້ອນຊື່ແທ້ຂອງທ່ານ">
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="txtSurname">ນາມສະກຸນ</label>
                <input type="text" class="form-control" name="txtSurname" id="txtSurname"  value="<?php if(isset($data['surname'])){ echo $data["surname"];} ?>" required placeholder="ປ້ອນນາມສະກຸນຂອງທ່ານ">
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="txtBirthday">ວ.ດ.ປ ເກິດ</label>
                <input 
                    type="date" 
                    class="form-control" 
                    name="txtBirthday" 
                    id="txtBirthday" 
                    value="<?php if(isset($data['birthday'])){echo $data['birthday']; } ?>" 
                    required 
                    placeholder="Enter your birthday"
            >
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="txtAge">ອາຍຸ</label>
                <input type="text" class="form-control" name="txtAge" id="txtAge" value="<?php if(isset($data['age'])){ echo $data['age'];} ?>" required placeholder="0">
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="txtEmail">ຂໍ້ມູນ Email</label>
                <input type="email" class="form-control" name="txtEmail" id="txtEmail" value="<?php if(isset($data['email'])){echo $data['email']; } ?>" required placeholder="ປ້ອນອີເມລ໌ຂອງທ່ານ">
            </div>
            <div class="form-group mb-3 mb-lg-0 col-md-5 px-md-5 py-2">
                <label for="txtMobile">ຂໍ້ມູນເບີໂທ</label>
                <input type="text" class="form-control" name="txtMobile" id="txtMobile" value="<?php if(isset($data['mobile'])){echo $data['mobile'];} ?>" required placeholder="ປ້ອນເບີໂທຂອງທ່ານ">
            </div>
            <div class="form-check mb-3 mb-lg-1 mt-md-4 ms-md-3  py-3 col-md-5 px-md-5">
                <input type="checkbox" class="form-check-input ms-auto me-2" name="txtFlag" id="txtFlag" <?php  if(isset($data['Flag'])){echo $data['Flag'] == 1 ? 'checked' : ''; } ?>>
                <label for="txtFlag">ສະຖານະ</label>
            </div>
            <div style="color:<?php echo $color; ?>;">
                <?php echo $msg; ?>
            </div>
            <div class="form-group mb-3 mt-3 mt-md-5 mx-auto">
                <div class="d-flex">
                <input type="submit" class="btn px-4 ms-auto btn-primary me-3" value="ບັນທີກ" name="submit" id="submit">
                <a href="./index.php" class="btn btn-secondary px-3">ກັບຄືນ</a>
                <div class="px-5 mx-md-2"> </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php include("./include/footer.php"); ?>
