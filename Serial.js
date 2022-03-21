



const countPatient = () =>
{
    fetch('Funct15.php')
    .then(res => res.json())
    .then(data => idMaker(data))
}





const idMaker = (number) =>
{
    const { Number } =  number[0];

    console.log(Number);
}
countPatient()



const Reg = () =>
{
    //event.preventDefault();
    let Patients = 
    {
        Name : "", 
        Age : "",
        Mobile : "",
        Gender : "" ,
        Doctor_id : "",
        Date : ""
    } 
       
   
    let Doctor_id = document.getElementById("d_id").value;
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


    
 /*    const detailesJson = JSON.stringify(Patients);
    console.log(detailesJson);

    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct3.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(detailesJson); */

}




