<script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function() {
            var product_id = $(this).attr("id");
            $.ajax({
                url: "./product/fetch.php",
                method: "POST",
                data: {
                    product_id: product_id
                },
                dataType: "json",
                success: function(data) {
                    $('#product_name').val(data.name);
                    $('#product_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

        
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#product_name').val() == "") {
                alert("กรุณาใส่ชื่อสินค้า");
            } else {
                $.ajax({
                    url: "./product/insert.php",
                    method: "POST",
                    data: $('#insert_form').serialize(),
                    beforeSend: function() {
                        $('#insert').val("Inserting");
                    },
                    success: function(data) {
                        $('#insert_form')[0].reset();
                        $('#add_data_Modal').modal('hide');
                        $('#employee_table').html(data);
                    }
                });
            }
        });


        $(document).on('click', '.view_data', function() {
            var product_id = $(this).attr("id");
            if (product_id != '') {
                $.ajax({
                    url: "./product/select.php",
                    method: "POST",
                    data: {
                        product_id: product_id
                    },
                    success: function(data) {
                        $('#product_id').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
    });
</script>