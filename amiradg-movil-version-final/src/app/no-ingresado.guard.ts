import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, RouterStateSnapshot, UrlTree } from '@angular/router';
import { NavController } from '@ionic/angular';
import { Observable } from 'rxjs';



@Injectable({
  providedIn: 'root'
})
export class NoIngresadoGuard implements CanActivate {

  constructor(public navCtrl: NavController){}

  // Permite guardar y validar localmente los datos proporcionados anteriormente en Registro.
  // Si los datos son correctos entonces, me redirecciona a la página Home
  

  canActivate(
    route: ActivatedRouteSnapshot,  
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      if(localStorage.getItem('ingresado')){  // Validación de los datos de usuario
        this.navCtrl.navigateRoot('home'); // Redirección a la página Home
        return false;
      }else{
        return true;

      }
  
    }
  }
