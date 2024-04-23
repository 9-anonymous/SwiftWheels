import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { MainPageComponent } from './MainPage/main-page/main-page.component';
import { MainSearchComponent } from './Searchs/mainSearch/main-search/main-search.component';
import { PostCarComponent } from './PostCar/post-car/post-car.component';
import { SignupComponent } from './Authentification/signUp/sign-up/sign-up.component';
import { EntCataComponent } from './ent-cata/ent-cata.component';

const routes: Routes = [
  { path: '' , component : MainPageComponent},
  { path: 'searchs' , component : MainSearchComponent },
  { path: 'AddCar' , component : PostCarComponent },
  { path: 'u' , component: SignupComponent},
  { path: 'entCata' , component: EntCataComponent}

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
