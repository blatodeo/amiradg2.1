import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {UserService} from './../_services/user.service';
import { ActionSheetController } from '@ionic/angular';
import { AlertController } from '@ionic/angular';
import {Router, ActivatedRoute} from '@angular/router';




@Component({
  selector: 'app-customers',
  templateUrl: './customers.page.html',
  styleUrls: ['./customers.page.scss'],
})
export class CustomersPage   {





  constructor(private http: HttpClient, private user:UserService, private actionSheetCtrl: ActionSheetController, private alertController: AlertController, private userService: UserService, private router:Router, private activatedRoute: ActivatedRoute) {
  }

  datos; 

  textoBuscar = '';




//Funcion para consultar los productos en la base de datos

  loadProducts() {
    this.http.get("http://localhost:8080/AMIRA-DG/consultados_prod.php").subscribe(snap=>{
      console.log(snap);
      this.datos=snap;
  
  });
  
  }
//Funcion para actualizar automaticamente la pagina, una vez terminado un proceso.
  ionViewWillEnter(){
    this.loadProducts();
  }  



//Funcion para validar eliminar
  async eliminar_prod(id:string) {
    const alert = await this.alertController.create({
      header:'Eliminar',
      subHeader:'Eliminar este item',
      message:'¿Estás seguro?',
      buttons: [{
        text: 'OK',
        handler: () =>{
          console.log('Borrando')
          this.http.get("http://localhost:8080/AMIRA-DG/eliminar_prod.php?id="+id).subscribe(snap=>{
            console.log(snap);
            this.loadProducts();

        });
      
        }
      },'Cancelar']
    })
  await alert.present();

  }

  



  async eli() { //Funcion para validar el cierre de sesion
    const alert = await this.alertController.create({
      header:'Salir',
      subHeader:'Cerrar Sesion',
      message:'¿Estás seguro?',
      buttons: [{
        text: 'OK',
        handler: () =>{
          this.router.navigate(['/login']);

        }
      },'Cancelar']
    })
    await alert.present();


  }


//Funcion para especificar el id, para posteriormente editarlo
    
  editar_prod(id: string){
    this.user.setId(id);
  }




  

  // Funcion para consultar los datos en la base de datos por medio del metodo 'http.get'

save_prod(){
  this.http.get("http://localhost:8080/AMIRA-DG/guardar_prod.php?nombre="+this.datos.nombre+"&categoria="+this.datos.categoria+"&vencimiento="+this.datos.vencimiento+"&existencias="+this.datos.existencias+"&creador="+this.datos.creador).subscribe(snap=>{
    console.log(snap);
}); 
}

buscar(event) {
  console.log(event);
  this.textoBuscar = event.detail.value; //Funcion para buscar items
}

dataAlbumes(){
  this.user.getAlbumes().subscribe(datos => { //Buscar los datos del id en la consola
    console.log(datos);
    this.datos = datos;
  })
}


}


