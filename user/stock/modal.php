
                    <div id="add_data_Modal" class="modal fade">
                        <div class="modal-dialog" style="max-width: 50%;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">ข้อมูลรายการสินค้า</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <?php $sql = "SELECT * FROM product";
                                $result = mysqli_query($connection, $sql);
                                ?>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="10%">ชื่อสินค้า</th>
                                                <th width="10%">คงเหลือ</th>
                                                <th width="10%">หน่วยนับ</th>
                                                <th width="10%">ราคาทุน</th>
                                                <th width="10%">ราคาขาย</th>
                                                <th width="10%" class="text-center">ดูรายละเอียด</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($row = mysqli_fetch_array($result)) :
                                            ?>
                                                <tr>
                                                    <td width="10%"><?php echo $row["product_name"] ?></td>
                                                    <td width="10%"><?php echo $row["product_net"] ?></td>
                                                    <td width="10%"><?php echo $row["product_unit"] ?></td>
                                                    <td width="10%"><?php echo $row["product_price"] ?></td>
                                                    <td width="10%"><?php echo $row["product_sale"] ?></td>
                                                    <td class="text-center"><a href="?page=<?= $_GET['page'] ?>&function=detail&product_id=<?= $row['product_id'] ?>" class=" btn btn-sm btn-info">รายละเอียด</a></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่างนี้</button>
                                </div>
                            </div>
                        </div>
                    </div>