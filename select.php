<?php
require 'config.php';
 $output = '';  
 $sql = "SELECT * FROM back2_leden ORDER BY id DESC";
 //hier worden de invulvelden gemaakt + leest de mensen uit de database
 $result = mysqli_query($mysqli, $sql);
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="27%">Voornaam</th>  
                     <th width="26%">Achternaam</th> 
                     <th width="27%">Email</th> 
                     
                     <th width="10%">verwijder</th>  
                </tr>';
 //hier maak je een maximaal aantal rijen om het overzichtelijk te houden
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 20)
	  {
		  $delete_records = $rows - 20;
		  $delete_sql = "DELETE FROM back2_leden LIMIT $delete_records";
		  mysqli_query($mysqli, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="Titel" data-id1="'.$row["id"].'" contenteditable>'.$row["Titel"].'</td>  
                     <td class="Text" data-id2="'.$row["id"].'" contenteditable>'.$row["Text"].'</td>  
                     <td class="Link" data-id3="'.$row["id"].'" contenteditable>'.$row["Link"].'</td>
                     <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="Titel" contenteditable></td>  
                <td id="Text" contenteditable></td> 
                <td id="Link" contenteditable></td> 
               
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '
				<tr>  
					<td></td>  
					<td id="Titel" contenteditable></td>  
					<td id="Text" contenteditable></td>
					<td id="Link" contenteditable></td>
					
				
					<td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
			   </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>