<?php
require_once 'connect.php';
echo '
        <table width="100%" class="table-admin">
            <tr>
                <td><b>کد محصول : </b></td>
                <td><b> نام محصول : </b></td>
                <td><b> موجودی : </b></td>
                <td><b>عملیات : </b></td>
            </tr>';

                $qury="SELECT * FROM depo   ORDER BY id DESC";
                mysqli_query($db, "SET NAMES utf8");
                $result=$db->query($qury);
                if($result->num_rows >0) {
                while ($row = $result->fetch_array()) {

                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo number_format($row['mojody']) . " عدد";?></td>
                        <td>
                            <table>
                                <tr>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $row['id']?>">
                                            ورود
                                        </button>
                                        <div class="modal fade" id="exampleModal<?php echo $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">افزودن  <?php echo $row['name']?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input type="text" id="answer<?php echo $row['id']?>" class="form-control" placeholder="تعداد را وارد کنید  ">

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success" onclick="asnwer_query(<?php echo $row['id']?>)" data-dismiss="modal" >افزودن </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><input type="button" class="btn btn-danger" value="خروج"></td>
                                </tr>
                            </table>
                        </td>


                    </tr>
            <?php

                    }
                }
            ?>
        <?php echo '</table>'?>
