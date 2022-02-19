<script>
    $(document).ready(function() {
        $('#add').click(function() {
            $('#insert').val("Insert");
            $('#insert_form')[0].reset();
        });
        $(document).on('click', '.edit_data', function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "./supplies/fetch.php",
                method: "POST",
                data: {
                    employee_id: employee_id
                },
                dataType: "json",
                success: function(data) {
                    $('#sup_name').val(data.name);
                    $('#employee_id').val(data.id);
                    $('#insert').val("Update");
                    $('#add_data_Modal').modal('show');
                }
            });
        });

        
        $('#insert_form').on("submit", function(event) {
            event.preventDefault();
            if ($('#sup_name').val() == "") {
                alert("กรุณาใส่ชื่อ");
            } else {
                $.ajax({
                    url: "./supplies/insert.php",
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
            var employee_id = $(this).attr("id");
            if (employee_id != '') {
                $.ajax({
                    url: "./supplies/select.php",
                    method: "POST",
                    data: {
                        employee_id: employee_id
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