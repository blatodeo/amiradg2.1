import { Component, OnInit } from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {UserService} from './../_services/user.service'
import {Router, ActivatedRoute} from '@angular/router';



@Component({
  selector: 'app-editar-prod',
  templateUrl: './editar-prod.page.html',
  styleUrls: ['./editar-prod.page.scss'],
})
export class EditarProdPage implements OnInit {

  id: string;
  datos:any={
  nombre:'',
  categoria:'',
  vencimiento:'',
  existencias:'',
  creador:''
}

  constructor(private http:HttpClient, private user:UserService, private router:Router, private activatedRoute: ActivatedRoute) {
    this.id=user.getId();
   }

  ngOnInit() {
    this.activatedRoute.paramMap.subscribe((paramMap)=> {
      if (paramMap.get('id')) {
        this.user
        .getIdProd(paramMap.get('id'))
        .subscribe((res) => {
          this.datos = res;
          console.log(this.datos)
        })
      }
  })

  }

  editar_prod(){
    this.http.get("http://localhost:8080/AMIRA-DG/editar_prod.php?id="+this.id+"&nombre="+this.datos.nombre+"&categoria="+this.datos.categoria+"&vencimiento="+this.datos.vencimiento+"&existencias="+this.datos.existencias+"&creador="+this.datos.creador).subscribe(snap=>{
      console.log(snap);
      this.router.navigate(['/customers']);

  });
  }


  loadProducts() {
    this.http.get("http://localhost:8080/AMIRA-DG/consultados_prod.php").subscribe(snap=>{
      console.log(snap);
      this.datos=snap;
  
  });
  
  }

  ionViewWillEnter(){
    this.loadProducts();
  }  


}
