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

async function countPatient() 
{
    let res = await fetch('Funct15.php'); 
    let data = await res.json();
    data = JSON.stringify(data);
    data = JSON.parse(data); 
    let id = idMaker(data);
    return id;
}

const idMaker = (number) =>
{
    const { Number } =  number[0];

    const count = parseInt(Number) 

    const id = getstring(count);
    return id;
}

async function a()
{
    let abc = await countPatient();
    console.log(abc);
}

a();

const Reg = () =>
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
        Date : ""
    } 

    /* console.log(countPatient());
    let Doctor_id = document.getElementById("d_id").value; */
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

    console.log(Patients);


    
 /*    const detailesJson = JSON.stringify(Patients);
    console.log(detailesJson);

    
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "Funct3.php");
    xhr.setRequestHeader("Content-Type", "applicatopn/json")
    xhr.send(detailesJson); */

}






/* let c = 10001;
let i,s;
for(i=0;i<50;i++)
{
    s = getstring(c,i)
    console.log(s)
} */