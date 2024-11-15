import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { ReactiveFormsModule } from '@angular/forms'; // Import ReactiveFormsModule from '@angular/forms'
import { HTTP_INTERCEPTORS } from '@angular/common/http';
import { AuthInterceptor } from './auth.interceptor';
import { EllipsisPipe } from './ellipsis.pipe'; 
import { CommonModule } from '@angular/common';


import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { MainPageComponent } from './MainPage/main-page/main-page.component';
import { NavBarComponent } from './MainPage/nav-bar/nav-bar.component';
import { FooterComponent } from './MainPage/footer/footer.component';
import { RecommandationComponent } from './MainPage/recommandation/recommandation.component';
import { WelcomePageComponent } from './MainPage/welcome-page/welcome-page.component';
import { BenefitsComponent } from './MainPage/benefits/benefits.component';
import { LoginComponent } from './login/login.component';
import { SignupComponent } from './signup/signup.component';
import { NewsComponent } from './news/news.component';
import { EmailComponent } from './email/email.component';
import { ContactListComponent } from './contact/contact-list/contact-list.component';
import { ContactMessageComponent } from './contact/contact-message/contact-message.component';
import { ContactInputComponent } from './contact/contact-input/contact-input.component';
import { NotificationBellComponent } from './notification/notification-bell/notification-bell.component';
import { NotificationListComponent } from './notification/notification-list/notification-list.component';
import { MainSearchComponent } from './Searchs/mainSearch/main-search/main-search.component';
import { SideNavComponent } from './Navigations/side-nav/side-nav.component';
import { PostCarComponent } from './PostCar/post-car/post-car.component';
import { EntCataComponent } from './ent-cata/ent-cata.component';









import { SettingsComponent } from './AdminProfile/settings/settings.component';
import { ProfileComponent } from './AdminProfile/profile/profile.component';
import { NavigationComponent } from './templates/navigation/navigation.component';
import { ContenuComponent } from './templates/contenu/contenu.component';
import { MenuComponent } from './templates/menu/menu.component';
import { AccueilComponent } from './accueil/accueil.component';
import { VenteComponent } from './vente/vente.component';
import { ClientComponent } from './client/client.component';
import { VoitureComponent } from './voiture/voiture.component';
import { UserProfileComponent } from './user-profile/user-profile.component';
import { PanierComponent } from './panier/panier.component';
import { ReceiptComponent } from './receipt/receipt.component';
import { SubscriptionModalComponent } from './subscription-modal/subscription-modal.component';
@NgModule({
  declarations: [
    AppComponent,
    EllipsisPipe,
    MainPageComponent,
    NavBarComponent,
    FooterComponent,
    RecommandationComponent,
    WelcomePageComponent,
    BenefitsComponent,
    LoginComponent,
    SignupComponent,
    NewsComponent,
    EmailComponent,
    ContactListComponent,
    ContactMessageComponent,
    ContactInputComponent,
    NotificationBellComponent,
    NotificationListComponent,
    MainSearchComponent,
    SideNavComponent,
    PostCarComponent,
    EntCataComponent,









    
    NavigationComponent,
    ContenuComponent,
    MenuComponent,
    AccueilComponent,
    VenteComponent,
    ClientComponent,
    VoitureComponent,
     ProfileComponent,
    SettingsComponent,
    UserProfileComponent,
    PanierComponent,
    ReceiptComponent,
    SubscriptionModalComponent,

  ],
  imports: [
    BrowserModule,
    CommonModule,
    FormsModule,
    HttpClientModule,
    ReactiveFormsModule, // Add ReactiveFormsModule here
    AppRoutingModule 
  ],
  providers: [
    { provide: HTTP_INTERCEPTORS, useClass: AuthInterceptor, multi: true }
  ],  bootstrap: [AppComponent]

 


})
export class AppModule { }
