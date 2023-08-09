import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Router, ActivatedRoute} from '@angular/router';
import { UserService } from '../_services/user.service';

@Component({
  selector: 'app-form',
  templateUrl: './form.page.html',
  styleUrls: ['./form.page.scss'],
})
export class FormPage implements OnInit {


  id: string;
  datos:any={
    nombre:'',
    preparacion:'',
    categoria:'',
    creador:'',
    imagen:''

  
}


  constructor(private http:HttpClient, private router:Router, private activatedRoute: ActivatedRoute, private user:UserService) {

   }
  

  ngOnInit() {
}

  save(){
    this.http.get("http://localhost:8080/AMIRA-DG/guardar.php?nombre="+this.datos.nombre+"&preparacion="+this.datos.preparacion+"&categoria="+this.datos.categoria+"&creador="+this.datos.creador+"&imagen="+this.datos.imagen).subscribe(snap=>{
      console.log(snap);
      this.router.navigate(['/home']);
  });

  }

}
