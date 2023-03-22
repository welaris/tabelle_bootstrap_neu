<?php  
 $connect = mysqli_connect("localhost", "root", "", "dblap");  
 $query ="SELECT * FROM tblkunden LEFT JOIN tblarbeitgeber ON tblkunden.idtblarbeitgeber = tblarbeitgeber.idtblarbeitgeber"; 
 $result = mysqli_query($connect, $query);

 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Kundendaten</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
      </head>
      <div class="container px-5 my-5">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactForm" data-sb-form-api-token="API_TOKEN">
        <div class="mb-3">
            <label class="form-label" for="vorname">vorname</label>
            <input class="form-control" id="vorname" name="vorname" type="text" placeholder="vorname" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="vorname:required">vorname is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="nachname">nachname</label>
            <input class="form-control" id="nachname" name="nachname" type="text" placeholder="nachname" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="nachname:required">nachname is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="strasse">strasse</label>
            <input class="form-control" id="strasse" name="strasse" type="text" placeholder="strasse" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="strasse:required">strasse is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="plz">plz</label>
            <input class="form-control" id="plz" name="plz" type="text" placeholder="plz" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="plz:required">plz is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="ort">ort</label>
            <input class="form-control" id="ort" name="ort" type="text" placeholder="ort" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="ort:required">ort is required.</div>
        </div>
        <div class="mb-3">
            <label class="form-label" for="arbeitgeber">Arbeitgeber</label>
            <input class="form-control" id="arbeitgeber" name="arbeitgeber" type="text" placeholder="arbeitgeber" data-sb-validations="required" />
            <div class="invalid-feedback" data-sb-feedback="arbeitgeber:required">arbeitgeber is required.</div>
        </div>
        <div class="d-none" id="submitSuccessMessage">
            <div class="text-center mb-3">
                <div class="fw-bolder">Form submission successful!</div>
                <p>To activate this form, sign up at</p>
                <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
            </div>
        </div>
        <div class="d-none" id="submitErrorMessage">
            <div class="text-center text-danger mb-3">Error sending message!</div>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary btn-lg" id="absenden" name="absenden" type="submit">Senden</button>
        </div>
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>

<?php
 if (isset($_POST['absenden'])) {      
      $vorname = $_POST['vorname'];
      $nachname = $_POST['nachname'];
      $strasse = $_POST['strasse'];
      $plz = $_POST['plz'];
      $ort = $_POST['ort'];
      
     $query_insert = "INSERT INTO tblkunden (vorname, nachname, strasse, plz, ort) VALUES ('$vorname', '$nachname', '$strasse', '$plz', '$ort')";
     mysqli_query($connect, $query_insert);
     header('Refresh:0');
}

 ?>
      <body>  
           <br /><br />  
           <div class="container">  
                <h3 align="center">Kundendaten</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="kunden_daten" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td>vorname</td>  
                                    <td>nachname</td>  
                                    <td>strasse</td>  
                                    <td>plz</td>  
                                    <td>ort</td>  
                                    <td>arbeitgeber</td>  
                               </tr>  
                          </thead>  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo '  
                               <tr>  
                                    <td>'.$row["vorname"].'</td>  
                                    <td>'.$row["nachname"].'</td>  
                                    <td>'.$row["strasse"].'</td>  
                                    <td>'.$row["plz"].'</td>  
                                    <td>'.$row["ort"].'</td> 
                                    <td>'.$row["name"].'</td> 
                               </tr>  
                               ';
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      $('#kunden_daten').DataTable();  // jquery -> DataTable wird initialisiert, ohne das würde kein Inhalt angezeigt
 });  
// $(document).ready(function(){
//      $('#kunden_daten').dataTable( {
//           "oLanguage": {
//                "sLengthMenu": "Zeige _MENU_ Einträge pro Seite",
//                "sZeroRecords": "Nix da",
//                 "sInfo": "Zeige _START_ bis _END_ von _TOTAL_ Einträgen",
//                  "sInfoEmpty": "Zeige 0 bis 0 von 0 Einträgen",
//                   "sInfoFiltered": "(gefiltert von _MAX_ total records)",
//                   "sSearch": 
//                    "Suche:",
//                    "lengthMenu":
//                     "Zeige _MENU_ Einträge",
//                      "paginate": {
//                          "sFirst": 
//                          "Erster",
//                           "sLast": 
//                            "Letzter",
//                             "sNext": 
//                              "Nächster",
//                               "sPrevious":
//                                "Vorheriger"
//                                } ,
//                                 aria: {
//                                     paginate: {
//                                          "sFirst": 
//                                          "Erster",
//                                           "sLast": 
//                                           "Letzter",
//                                            "sNext": 
//                                            "Nächster",
//                                             "sPrevious": 
//                                             "Vorheriger" 
//                                         }
//                                     }
//                                    }
//                               } );
//                           }); 
 </script> 