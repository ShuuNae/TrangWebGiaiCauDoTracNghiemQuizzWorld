import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateUpdateQuizzComponent } from './create-update-quizz.component';

describe('CreateUpdateQuizzComponent', () => {
  let component: CreateUpdateQuizzComponent;
  let fixture: ComponentFixture<CreateUpdateQuizzComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CreateUpdateQuizzComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateUpdateQuizzComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
