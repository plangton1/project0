<script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function() {
            var type_id = $(this).attr("id");
            $.ajax({
                url: "./type/fetch.php",
                method: "POST",
                data: {
                    type_id: type_id
                },
                dataType: "json",
                success: function(data) {
                    $('#type_name').val(data.name);
                    $('#type_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

        
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#type_name').val() == "") {
                alert("กรุณาใส่ชื่อประเภทสินค้า");
            } else {
                $.ajax({
                    url: "./type/insert.php",
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
            var type_id = $(this).attr("id");
            if (type_id != '') {
                $.ajax({
                    url: "./supplies/select.php",
                    method: "POST",
                    data: {
                        type_id: type_id
                    },
                    success: function(data) {
                        $('#employee_detail').html(data);
                        $('#dataModal').modal('show');
                    }
                });
            }
        });
    });
</script>