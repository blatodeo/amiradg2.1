import { Component, OnInit } from '@angular/core';
import{
  FormGroup,
  FormControl,
  Validators,
  FormBuilder,
}from '@angular/forms';
import { AlertController, NavController } from '@ionic/angular';

@Component({
  selector: 'app-login',
  templateUrl: './login.page.html',
  styleUrls: ['./login.page.scss'],
})
export class LoginPage implements OnInit {

  credenciales = {
    correo: null,
    password: null
  }

  formularioLogin: FormGroup; //Nombrar la función que será llamada desde el formulario HTML

  constructor(public fb: FormBuilder,
    public alertController: AlertController,
    public navCtrl: NavController) {
    this.formularioLogin = this.fb.group({  //Declarar que el formulario debe contener los siguientes datos:
      'nombre' : new FormControl("",Validators.required),
      'password' : new FormControl("",Validators.required)

    })

   }

  ngOnInit() {
  }



  async ingresar(){
    var f = this.formularioLogin.value;

    var usuario = JSON.parse(localStorage.getItem('usuario'));

    if(usuario.nombre == f.nombre && usuario.password == f.password) { //En caso de que no se hayan ingresado los datos o estos sean incorrectos
      console.log('Ingresado');
      localStorage.setItem('ingresado','true');
      this.navCtrl.navigateRoot('home');
    }else{
      const alert = await this.alertController.create({
        header: 'Datos incorrectos',        
        message:'Los datos que ingresaste son incorrectos',
        buttons:['Aceptar']
      });
  
      await alert.present();
    }
  }
  
}
