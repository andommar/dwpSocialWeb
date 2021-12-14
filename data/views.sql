CREATE VIEW V_AboutUs_company AS
SELECT * FROM company;

CREATE VIEW V_AboutUs_developers AS
SELECT * FROM company_developer WHERE company_name='socially';
 
CREATE VIEW V_AboutUs_web AS
SELECT * FROM web_insight WHERE company_name='socially';
