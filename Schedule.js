const Scm2 = () =>
{
    let Schedule =
    {
        Date : "",
        Time : "",
        Doctor_id : "" 
    }

    


    Schedule.Date = document.getElementById("date").value;
    Schedule.Time = document.getElementById("time").value;
    Schedule.Doctor_id = document.getElementById("doc_id").value;

    
    let json = JSON.stringify(Schedule); 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct6.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(json);
}