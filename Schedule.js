const Scm2 = () =>
{
    let Scedule =
    {
        Date : "",
        Time : "",
        Doctor_id : "" 
    }

    


    Scedule.Date = document.getElementById("date").value;
    Scedule.Time = document.getElementById("time").value;
    Scedule.Doctor_id = document.getElementById("doc_id").value;
    let json = JSON.stringify(Scedule);
    console.log(json); 
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct6.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(json);
}