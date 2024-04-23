import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EntCataComponent } from './ent-cata.component';

describe('EntCataComponent', () => {
  let component: EntCataComponent;
  let fixture: ComponentFixture<EntCataComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [EntCataComponent]
    });
    fixture = TestBed.createComponent(EntCataComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
