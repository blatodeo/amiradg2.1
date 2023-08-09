import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: '',
    redirectTo: 'login',
    pathMatch: 'full'
  },
  {
    path: 'inicio',
    loadChildren: () => import('./inicio/inicio.module').then( m => m.InicioPageModule)
  },
  {
    path: 'customers',
    loadChildren: () => import('./customers/customers.module').then( m => m.CustomersPageModule)
  },
  {
    path: 'login',
    loadChildren: () => import('./login/login.module').then( m => m.LoginPageModule),
  },
  {
    path: 'registro',
    loadChildren: () => import('./registro/registro.module').then( m => m.RegistroPageModule),

  },
  {
    path: 'home',
    loadChildren: () => import('./home/home.module').then( m => m.HomePageModule),

  },
  {
    path: 'form',
    loadChildren: () => import('./form/form.module').then( m => m.FormPageModule)
  },
  {
    path: 'recipes/edit/:itemId',
    loadChildren: () => import('./form/form.module').then( m => m.FormPageModule)

  },

  {
    path: 'editar',
    loadChildren: () => import('./editar/editar.module').then( m => m.EditarPageModule)
  },
  {
    path: 'editar/:id',
    loadChildren: () => import('./editar/editar.module').then( m => m.EditarPageModule)
  },

  {
    path: 'form-prod',
    loadChildren: () => import('./form-prod/form-prod.module').then( m => m.FormProdPageModule)
  },
  {
    path: 'products/edit/:itemId',
    loadChildren: () => import('./form-prod/form-prod.module').then( m => m.FormProdPageModule)

  },

  {
    path: 'editar-prod',
    loadChildren: () => import('./editar-prod/editar-prod.module').then( m => m.EditarProdPageModule)
  },
  {
    path: 'editar-prod/:id',
    loadChildren: () => import('./editar-prod/editar-prod.module').then( m => m.EditarProdPageModule)
  },

  {
    path: 'refresher',
    loadChildren: () => import('./pages/refresher/refresher.module').then( m => m.RefresherPageModule)
  },
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules })
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
