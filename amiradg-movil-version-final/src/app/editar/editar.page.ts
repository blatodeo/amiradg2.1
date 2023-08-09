import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Dato, UserService} from './../_services/user.service'
import {Router, ActivatedRoute} from '@angular/router';


@Component({
  selector: 'app-editar',
  templateUrl: './editar.page.html',
  styleUrls: ['./editar.page.scss'],
})
export class EditarPage implements OnInit {

  id: string;
  datos:Dato={
    nombre:'',
    preparacion:'',
    categoria:'',
    creador:'',
    imagen:''

  
}


  constructor(private http:HttpClient, private user:UserService, private router:Router, private activatedRoute:ActivatedRoute) {
    this.id=user.getId();

   }

   ngOnInit() {
    this.activatedRoute.paramMap.subscribe((paramMap)=> {
      if (paramMap.get('id')) {
        this.user
        .getIdRecipes(paramMap.get('id'))
        .subscribe((res) => {
          this.datos = res;
          console.log(this.datos)
        })
      }
  })

  }



  update(){
    this.http.get("http://localhost:8080/AMIRA-DG/editar.php?id="+this.id+"&nombre="+this.datos.nombre+"&preparacion="+this.datos.preparacion+"&categoria="+this.datos.categoria+"&creador="+this.datos.creador+"&imagen="+this.datos.imagen).subscribe(snap=>{
      console.log(snap);
      this.router.navigate(['/home']);
  });
  }

 




}
