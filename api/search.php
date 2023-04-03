<!DOCTYPE html>

<head>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script lang="ja" type="text/javascript">

</script>
</head>
<body>
<div>
<h2>Flight Search  </h2>
    <table width="100%">
        <tr>
            <td style="width:25%">
                <table width="100%">
                   
                    <tr>
                        <td style="width:100px">Origin :  </td>
                        <td><input type="text" id="txtOrigin" maxlength="10" /></td>
                    </tr>
                    <tr>
                        <td style="width:100px">Destination :  </td>
                        <td><input type="text" id="txtDestination" maxlength="10" /></td>
                    </tr>
                    <tr>
                        <td style="width:100px">Departure Date: </td>
                        <td><input type="date" id="txtDeparture" /></td>
                    </tr>
                    <tr>
                        <td style="width:100px">Number of passengers :  </td>
                        <td><input type="text" id="txtPassengers" maxlength="3"/></td>
                    </tr>
                    <tr>
                        <td style="width:100px"></td>
                        <td>
                            <input id="btnFlightSearch" type="button" onclick="SearchFlight();" value="Search" />
                        </td>
                    </tr>

                </table>
            </td>
            <td>
                
            </td>
        </tr>

    </table>
</div>
</body>
<script type="text/javascript">
document.getElementById('btnFlightSearch').onclick = function(e){
    e.preventDefault()
    let origin = $('#txtOrigin').val();
    let destination = $('#txtDestination').val();
    let departuredate = $('#txtDeparture').val();
    let no_of_passengers = $('#txtPassengers').val();
    if (origin === "") {
        alert('Origin is required');
    }else if (destination === ""){
        alert('Destination is required');
    }else if (departuredate === ""){
        alert('Departure date is required');
    }else if (no_of_passengers === ""){
        alert('No. of passengers is required');
    }

    $.ajax({
            url: "searchselect.php",
            type: "POST",
            dataType: "JSON",
            data: { origin : origin,  destination : destination,  departuredate : departuredate,  no_of_passengers : no_of_passengers},
            success: function(response){
                
                console.log(response);
                //alert("Searched successfully");
                // document.getElementById("formid").reset();
        },
            error: function(error){
                console.log(JSON.stringify(error));
                alert('No record found')
        }
         });
}
</script>
</html>

