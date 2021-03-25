import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CreateUpdateTopicComponent } from './create-update-topic.component';

describe('CreateUpdateTopicComponent', () => {
  let component: CreateUpdateTopicComponent;
  let fixture: ComponentFixture<CreateUpdateTopicComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CreateUpdateTopicComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CreateUpdateTopicComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
