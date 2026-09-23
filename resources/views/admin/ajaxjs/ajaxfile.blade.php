<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $('document').ready(function(){

        $('#speciality_id').on('change',function(){
            var id = $(this).val();              
            $.ajax({
                url:"{{url('admin/getSubspecialityDetailById')}}",
                method:"GET",
                data:{
                    id,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(data){
                   
                    $('#subspeciality_id').empty(); 
                    let r = new Option("Select Sub-Speciality",""); 
                    $('#subspeciality_id').append(r); 
                 $.each(data,function(key,value){
                    let s = new Option(value.name,value.id); 
                    $('#subspeciality_id').append(s); 
                });
                },
                error:function(err){
                    console.log(err); 
                }
            });
        }); 
    });
   </script>


<script>
    $('document').ready(function(){

        $('#speciality_id').on('change',function(){
            var id = $(this).val();              
            $.ajax({
                url:"{{url('admin/getTreatmentDetailById')}}",
                method:"GET",
                data:{
                    id,
                    "_token": "{{ csrf_token() }}",
                },
                success:function(data){
                   
                    $('#treatments').empty(); 
                    let r = new Option("Select Treatments",""); 
                    $('#treatments').append(r); 
                 $.each(data,function(key,value){
                    let s = new Option(value.name,value.id); 
                    $('#treatments').append(s); 
                });
                },
                error:function(err){
                    console.log(err); 
                }
            });
        }); 
    });
   </script>


<script>
document.getElementById('title').addEventListener("input", function(){
    let title = document.getElementById('title').value;        
    console.log(title);
    title = title.toLowerCase();
    title = title.replace(/\s+/g, '-');
    document.getElementById('slug').value = title;
    console.log(document.getElementById('slug').value);
});
</script>

 