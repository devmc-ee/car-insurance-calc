<?php
$sql="SELECT 	employees.name, employees.birthdate, employees.id_code, employees.is_active,
				concat('Email: ', email.contact_value, '- Tel: ', tel.contact_value, '-Address: ',address.contact_value) as contacts,
				concat ('- Into: ', eng.introduction, '- Education: ', eng.education, '- Expirience ', eng.work_experience) as engInfo,
				concat ('- Into: ', fra.introduction, '- Education: ', fra.education, '- Expirience ', fra.work_experience) as fraInfo,
				concat ('- Into: ', spa.introduction, '- Education: ', spa.education, '- Expirience ', spa.work_experience) as spaInfo,
				employee_log.date_created, employee_log.date_last_updated, employee_log.created_by_user, employee_log.created_by_user
	FROM ((employees
			LEFT JOIN (employee_information eng, employee_information fra, employee_information spa)
			ON employees.id = eng.employee_id
	)
			LEFT JOIN (employee_contacts tel, employee_contacts email, employee_contacts address)
			ON (employees.id = tel.employee_id) AND(employees.id = email.employee_id) and (employees.id = address.employee_id)
			LEFT JOIN employee_log
			ON employees.id = employee_log.employee_id)
	WHERE eng.employee_id = fra.employee_id AND spa.employee_id = eng.employee_id
	AND eng.language_id = 1
	AND fra.language_id = 3
	AND spa.language_id = 2
	AND tel.contact_type= 2
	AND email.contact_type =1
	AND address.contact_type = 3;";