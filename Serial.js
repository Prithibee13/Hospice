const getstring = (count) =>
{
    let c = 1000;
    let s = ""
    if(count<26)
    {
        s = c + "" + s+String.fromCharCode(65+count);
    }

    else
    {
       /*  return getstring(li/26-1)+String.fromCharCode(li%26+65) */
       count = count%26;
       c = c+1;
       s = c + "" + s+String.fromCharCode(65+count);

    }
    return s;
}

function registration() 
{
    document.getElementById("new-p").style.display = "block";
    fetch('Funct15.php').
    then(res => res.json())
    .then( data => detailes(data))
    
}
 
const idMaker = (number) =>
{
    const start = 1000;
    let id = start + number +1;
    return id;
} 


const detailes = (number) =>
{
    //event.preventDefault();
    let Patients = 
    {
        Patient_id : "",
        Name : "", 
        Age : "",
        Mobile : "",
        Gender : "" , 
        Doctor_id : "",
        Date : "",
        appointment_id : "" 
    } 

    
    const { Number } =  number[0];

    const count = parseInt(Number) 

    const p_id = getstring(count);
    Patients.Patient_id = p_id;

    const a_id = idMaker(count);
    Patients.appointment_id = a_id;

    let Doctor_id = document.getElementById("doctor").value; 
    let Date = document.getElementById("date").value;
    let Name = document.getElementById("Name").value;
    let Age = document.getElementById("age").value;
    let Gender = document.getElementById("gen").value;
    let Mobile = document.getElementById("mobile").value

    Patients.Name += Name;
    Patients.Age += Age;
    Patients.Mobile += Mobile;
    Patients.Gender += Gender;
    Patients.Doctor_id += Doctor_id;
    Patients.Date += Date;


    dataSend(Patients);
    
    document.getElementById("new-p").style.display = "none";

    
}

const dataSend = (patient) =>
{
    console.log(patient);
    
    const detailesJson = JSON.stringify(patient);
    console.log(detailesJson);

    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct3.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(detailesJson);  

    
    document.getElementById("new-p").style.display = "none";


    showDetails(patient.Patient_id , patient.Date);

}

const showDetails = (id , date) =>
{
    const sentData = 
    {
        id : id,
        date : date
    }

    let headers = {
        "Content-Type": "application/json"
    }

    fetch("Funct28.php" , {method : "POST" , headers :headers , body: JSON.stringify(sentData)})
    .then(res => res.json())
    .then(data => console.log(data))
}

const reg = () =>
{
    document.getElementById("old-p").style.display = "block";
    fetch('Funct15.php').
    then(res => res.json())
    .then( data => formData(data))
    
}


const formData = (data) =>
{
    const oldPatient = {
        p_id : "",
        doc_id : "",
        date : "",
        appointment_id : ""
    }

    const { Number } =  data[0];

    const count = parseInt(Number) 

    oldPatient.p_id = document.getElementById("id").value;
    oldPatient.doc_id = document.getElementById("doctor-old").value;
    oldPatient.date = document.getElementById("date-old").value;
    

    oldPatient.appointment_id = idMaker(count)

    oldDataSend(oldPatient);

}

const oldDataSend = (records) =>
{
    const detailesJson = JSON.stringify(records);
    console.log(detailesJson);

    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct26.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(detailesJson);

    document.getElementById("old-p").style.display = "none";
}







/* let c = 10001;
let i,s;
for(i=0;i<50;i++)
{
    s = getstring(c,i)
    console.log(s)
} */