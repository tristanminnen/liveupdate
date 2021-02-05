<html>  
    <head>  
        <title>oefen shizle</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
				<span id="result"></span>
				<div id="live_data"></div>                 
			</div>  
		</div>
    </body>  
</html>  
<script>


    //spreekt de select pagina aan
$(document).ready(function(){  
    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }



    //dit geeft je een waarschuwing als je nog niks hebt ingevuld
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var Titel = $('#Titel').text();  
        var Text = $('#Text').text();
        var Link = $('#Link').text();
        if(Titel == '')  
        {  
            alert("Voeg voornaam toe!");
            return false;  
        }  
        if(Text == '')  
        {  
            alert("Voeg achternaam toe!");
            return false;  
        }
        if(Link == '')
        {
            alert("Voeg Link toe!");
            return false;
        }

        //spreekt de pagina aan die alles in de database zet
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{Titel:Titel, Text:Text, Link:Link},
            dataType:"text",  
            success:function(data)  
            {  
                alert(data);  
                fetch_data();  
            }  
        })  
    });  



    //spreekt de pagina aan die alles wijzicht
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				$('#result').html("<div class='alert alert-success'>"+data+"</div>");
            }  
        });  
    }


    //kijkt of de text is aangepast
    $(document).on('blur', '.Titel', function(){  
        var id = $(this).data("id1");  
        var Titel = $(this).text();  
        edit_data(id, Titel, "Titel");  
    });  
    $(document).on('blur', '.Text', function(){  
        var id = $(this).data("id2");  
        var Text = $(this).text();  
        edit_data(id,Text, "Text");  
    });
    $(document).on('blur', '.Link', function(){
        var id = $(this).data("id3");
        var Link = $(this).text();
        edit_data(id,Link, "Link");
    });
    //kijkt of je de delete button hebt ingeklikt
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id4");
        if(confirm("Weet je zeker dat je dit wilt verwijderen"))
        {


            // als je de delete butoon klikt delete hij deze rij
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>