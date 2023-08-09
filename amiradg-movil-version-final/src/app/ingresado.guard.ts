import { Injectable } from '@angular/core';
import { ActivatedRouteSnapshot, CanActivate, RouterStateSnapshot, UrlTree } from '@angular/router';
import { NavController } from '@ionic/angular';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class IngresadoGuard implements CanActivate {

constructor(public navCtrl: NavController){}

// Me permite validar datos que se registren localmente
// Una vez guardados, me redireccionará a la pagina login


  canActivate(
    next: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      if(localStorage.getItem('ingresado')){ // Validación de los datos de usuario
        return true;
      }else{
        this.navCtrl.navigateRoot('login');  // Redirección a la página Login
        return false;
      }
  }
  
}
