import { Component, OnInit } from '@angular/core';
import{
  FormGroup,
  FormControl,
  Validators,
  FormBuilder,
}from '@angular/forms';
import { GuardsCheckStart } from '@angular/router';
import { AlertController, NavController } from '@ionic/angular';
import {HttpClient} from '@angular/common/http';


@Component({
  selector: 'app-registro',
  templateUrl: './registro.page.html',
  styleUrls: ['./registro.page.scss'],
})
export class RegistroPage implements OnInit {



  formularioRegistro: FormGroup;  //Nombrar la función que será llamada desde el formulario HTML
  
  constructor(public fb: FormBuilder,
    public alertController: AlertController,
    public navCtrl: NavController,
    private http:HttpClient) {
    this.formularioRegistro = this.fb.group({ //Declarar que el formulario debe contener los siguientes datos:
      'nombre' : new FormControl("",Validators.required), //El dato 'nombre' será requerido en el formulario
      'password' : new FormControl("",Validators.required), //El dato 'password' será requerido en el formulario
      'confirmacionPassword' : new FormControl("",Validators.required) //El dato 'confirmacionPassword' será requerido en el formulario

    });

   }

   datos:any={
    nombre:'',
    correo:'',
    contrasena:'',
    rol:'',
}


ngOnInit() {
  
};

//Prueba para guardar los datos en la base de datos MySQL no exitosa

save_user(){
  this.http.get("http://localhost:8080/AMIRA-DG/guardar_usuario.php?nombre="+this.datos.nombre+"&correo="+this.datos.correo+"&contrasena="+this.datos.contraseña+"&rol="+this.datos.rol).subscribe(snap=>{
    console.log(snap);
});

}


//Funcion para guardar datos de registro de usuario

async guardar(){ //Nombrar funcion
  var f = this.formularioRegistro.value; //Nombrar variable 
  
  if(this.formularioRegistro.invalid){ //En caso de que no se hayan ingresado los datos o estos sean incorrectos
    const alert = await this.alertController.create({
      cssClass:'my-custom-class',
      header: 'Datos incompletos',  //Entonces se abre una ventana emergente que indica que los datos están incompletos
      subHeader:'',
      message:'Tienes que llenar todos los datos', //Un mensaje de recomendación
      buttons:['Aceptar']  //Botón para aceptar el mensaje y cerrar la ventana
    });

    await alert.present();
    return;
  }

  var usuario = {  //Se declaran las variables para guardarlas en el localStorage
    nombre: f.nombre,
    password:f.password,
  }
  localStorage.setItem('usuario',JSON.stringify(usuario)); //Se guarda en el localStorage
  }
}
