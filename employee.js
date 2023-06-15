var sts1=0;
var eml='';
var sts2=0;
fetch('http://localhost/3rd_jobsite/api/employee_api.php')
           .then(res=>{
            // console.log(res);
                sts1=res.status;
                return res.json();
           })
           .then(resp=>{
            console.log(resp);
            eml=resp;
            // console.log(value);
             if(sts1==200){
                let v='';
                resp.map((val)=>{
                  eml=`${val.email}`;
                  v+=`<div class="ui card" style="width: 18rem; margin: 5%;">
                  <div class="content">
                    <div class="header">${val.company}</div>
                    <div class="meta">${val.openings}</div>
                    <div class="description">
                      <h5>${val.role}</h5>
                      <p>${val.skills}</p>
                      <p>${val.description}</p>
                    </div>
                    <div class="extra content">
                      CTC: ${val.ctc} lpa
                    </div>
                  </div>
                </div>`
                });
                document.getElementById("employee_job").innerHTML=v;
                console.log(eml);
                // glb=eml;
                assign(eml);
             }
             else if(sts1==202){
              // console.log(sts1);
              // console.log(eml);
                assign(eml);
             }
             else{
              console.log(sts1);
             }
           })
           .catch(error=>console.log("Failed to load API"));
           
function assign(a){
  eml=a;
  console.log(eml);
}
function form_go(){
  var a=document.getElementById("email");
  a.value=eml;
  console.log(eml);
  $('.ui.accordion')
  .accordion();
}


const open_modal = () => {
  $('.ui.fullscreen.scrollable.modal').modal('setting',
      'transition', 'horizontal flip').modal('show');
  
  fetch('http://localhost/3rd_jobsite/api/applied_api.php')
      .then(res=>{
       // console.log(res);
           sts2=res.status;
           return res.json();
      })
      .then(resp=>{
       console.log(resp);
       // console.log(value);
        if(sts2==200){
           let v='';
           resp.map((val)=>{
             v+=`<tr>
             <td>${val.id}</td>
             <td>${val.role}</td>
             <td>${val.name}</td>
             <td><a href="${val.resume}" target="_blank"><i style="font-size: 20px;" class="fa fa-eye"></i></a></td>
             <td><a href="${val.letter}" target="_blank"><i style="font-size: 20px;" class="fa fa-eye"></i></a></td>
             <td><a href="${val.linked_in}" target="_blank"><i style="font-size: 20px;" class="fa fa-linkedin"></i></a></td>
             <td><a href="mailto:${val.mail}" target="_blank"><i style="font-size: 20px;" class="fa fa-envelope"></i></a></td>
             <td>${val.phone}</td>
             </tr>`
           });
           document.getElementById("applied_body").innerHTML=v;
        }
        else{
         console.log(sts2);
        }
      })
      .catch(error=>console.log("Failed to load API"));
}