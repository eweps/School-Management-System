# Database Structure

## Teachers

- **id**
- **user_id**
- **firstname**
- **lastname**
- **id_card_number**
- **address**
- **gender**
- **marital_status**
- **phone_number**
- **date_of_birth**
- **place_of_birth**
- **salutation** (Mrs, Miss, Mr, Dr, Prof, Chief, Engr)
- **preferred_language**
- **academic_diplomas**
- **professional_diplomas**
- **professional_experience**
- **other_relevant_info**
- **created_at**
- **updated_at**

## Teacher Course

- **id**
- **teacher_id**
- **course_id**
- **created_at**
- **updated_at**

## Students

- **id**
- **user_id**
- **firstname**
- **lastname**
- **email**
- **course_session_id**
- **diploma_id**
- **department_id**
- **id_card_number**
- **address**
- **gender**
- **marital_status**
- **salutation** (Mrs, Miss, Mr, Dr, Prof, Chief, Engr)
- **preferred_language**
- **academic_diplomas**
- **professional_diplomas**
- **professional_experience**
- **other_relevant_info**
- **phone_number**
- **date_of_birth**
- **place_of_birth**
- **created_at**
- **updated_at**

## Course Sessions

- **id**
- **name**
- **description**
- **start_time**
- **end_time**
- **created_at**
- **updated_at**

## Student Documents

- **id**
- **student_id**
- **title**
- **description** (nullable)
- **path**
- **created_at**
- **updated_at**

## Admins

- **id**
- **user_id**
- **firstname**
- **lastname**
- **id_card_number**
- **address**
- **gender**
- **marital_status**
- **phone_number**
- **date_of_birth**
- **place_of_birth**
- **created_at**
- **updated_at**

## Diplomas (HND, Bachelors, Masters)

- **id**
- **name**
- **description** (nullable)
- **created_at**
- **updated_at**

## Departments

- **id**
- **name**
- **diploma_id**
- **description** (nullable)
- **created_at**
- **updated_at**

## Courses

- **id**
- **name**
- **code**
- **semester_id**
- **credit_value**
- **description**
- **created_at**
- **updated_at**

## Course Department

- **id**
- **course_id**
- **department_id**
- **created_at**
- **updated_at**

## Levels

- **id**
- **name**
- **description** (nullable)
- **created_at**
- **updated_at**

## Student Levels

- **id**
- **student_id**
- **level_id**
- **created_at**
- **updated_at**

## Users

- **id**
- **username**
- **email**
- **password**
- **email_verified_at**
- **created_at**
- **updated_at**

## Roles (Spatie Permission)

- **student**
- **teacher**
- **admin**
- **staff**

## Schedules

- **id**
- **title**
- **description**
- **date** (datetime)
- **created_at**
- **updated_at**

## Live Classes

- **id**
- **title**
- **description** (nullable)
- **link**
- **date** (datetime)
- **created_at**
- **updated_at**

## CA Marks

- **id**
- **user_id**
- **student_id**
- **course_id**
- **mark**
- **created_at**
- **updated_at**

## Exam Marks

- **id**
- **user_id**
- **student_id**
- **course_id**
- **mark**
- **created_at**
- **updated_at**

## Semesters

- **id**
- **name**
- **description** (nullable)
- **created_at**
- **updated_at**

## Learning Resources

- **id**
- **teacher_id**
- **course_id**
- **title**
- **description** (nullable)
- **path**
- **created_at**
- **updated_at**

## Fee Records

- **id**
- **student_id**
- **receipt**
- **amount_paid**
- **total_amount**
- **amount_left**
- **created_at**
- **updated_at**

## Attendances

- **id**
- **user_id**
- **student_id**
- **course_id**
- **is_present** (true or false)
- **created_at**
- **updated_at**

## Settings

- **id**
- **name**
- **value**
- **created_at**
- **updated_at**
