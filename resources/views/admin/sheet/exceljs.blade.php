<script>
    $(".excel-import").click(function(){
        $(this).siblings("input#excel_import").click();
    })
    $(document).on('change', 'input#excel_import', function(){
        var name = $(this).data("name");
        let file = $(this)[0].files[0];
        let client_id = $(this).data("id");
        var reader = new FileReader();

        reader.onload = function(e) {
            var data = e.target.result;
            var workbook = XLSX.read(data, {
                type: 'binary'
            });

            workbook.SheetNames.forEach(function(sheetName) {
                // Here is your object
                
                var XL_row_object = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[sheetName]);
                // $('.preloader').css('display','block');
<<<<<<< HEAD
                $('#spreadsheet-table_processing').css('display','block');
=======
>>>>>>> b4c920d2663870fe6cf850e51a3b33cea0b6eb23
                send_rows(XL_row_object, 0, client_id,name);
                // var json_object = JSON.stringify(XL_row_object);
                // console.log(json_object);
            })
        };

        reader.onerror = function(ex) {
            console.log(ex);
        };

        reader.readAsBinaryString(file);
    });
    function send_rows1(rows, index, client_id,name){
<<<<<<< HEAD
        $('#spreadsheet-table_processing').css('display','block');
=======
        $('.preloader').css('display','block');
>>>>>>> b4c920d2663870fe6cf850e51a3b33cea0b6eb23
        send_rows(rows, index, client_id,name);
    }
    function send_rows(rows, index, client_id,name){
        // $('.preloader').css('display','block');
        console.log(client_id);
        let  send_rows = [];
        let add = 100;
        for(i = index; i <= index+add; i++){
            send_rows.push(rows[i]);
        }
        $.ajax({
            url: "{{ route('sheet.upload') }}",
            method: "post",
            datatype: "json",
            data: {
                client_id: client_id,
                rows: send_rows,
                name:name,
                "_token":"{{csrf_token()}}",
                
            },
            error: function(err){
                console.log(err);
            },
            success: function(result){
<<<<<<< HEAD
                $('#spreadsheet-table_processing').css('display','block');
=======
                $('.preloader').css('display','block');
>>>>>>> b4c920d2663870fe6cf850e51a3b33cea0b6eb23
                // result = JSON.(result);
                index += add;
                console.log(index);
                if(result.status){
                    if(rows.length > index){
                        send_rows1(rows, (index+1), client_id,name);
                        return;
                    }
                }
<<<<<<< HEAD
                let data = new FormData();
                data.append("file", $("input#excel_import")[0].files[0]);
=======
>>>>>>> b4c920d2663870fe6cf850e51a3b33cea0b6eb23
                $.ajax({
                    url: "{{ url('/spreadsheet-uploaded/') }}/"+rows.length,
                    method: "get",
                    error: function(err){
                        console.log(err);
                    },
                    success: function(result){
                        
<<<<<<< HEAD
                        $('#spreadsheet-table_processing').css('display','block');
                        // window.location.reload();
                        // $('.spreadsheet-refresh').trigger('click');
                    }
                });
                $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{{ route('sheet.save') }}",
                    method: "post",
                    data:data,
                    processData: false,
                    contentType: false,
                    error: function(err){
                        console.log(err);
                    },
                    success: function(result){
                        console.log(result);
                        $('#spreadsheet-table_processing').css('display','block');
                        window.location.reload();
                        // $('.spreadsheet-refresh').trigger('click');
=======
                        $('.preloader').css('display','block');
                        window.location.reload();
>>>>>>> b4c920d2663870fe6cf850e51a3b33cea0b6eb23
                    }
                });
            }
        })
    }
</script>