const Scm2 = () =>
{
    document.getElementById("schedule-spinner").style.display = "block";
    let Schedule =
    {
        Date : "",
        Time : "",
        Doctor_id : "",
        Capacity : ""
    }

    


    Schedule.Date = document.getElementById("date").value;
    Schedule.Time = document.getElementById("time").value;
    Schedule.Capacity = document.getElementById("capacity").value;
    Schedule.Doctor_id = document.getElementById("doc_id").value;


    
    let json = JSON.stringify(Schedule); 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct6.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(json); 

    document.getElementById("schedule-spinner").style.display = "none";
}