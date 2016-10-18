# laymeneasylife

The purpose of this project is to automate the creation of database columns in selected Models , all from front end, no need of coding.


##Demo site
http://laymeneasylife.azurewebsites.net/

DIRECTORY STRUCTURE
-------------------

     
      coreviewmodels/     The core models for this project
      crudTemplates/      The templates which will create model and crud views for us
      modules/Generator   The code generator which is ingerited from gii
      viewmodels/         The models which will be created by code generator
      
	  The rest structure is same as yii2 basic application

##Things done till now

GII is override and a customized generated is developed. It has a single text box. Entering a value in the text box will do following things for you.
~~~
Create a table {value in text box}
Create a model from the table created in above step
Create crud from above model with search model
Add the newly created model name in models table, so that it will be available for you when creating formfields for this model.
~~~


now your new crud is ready and the newly table will have only id,created_at,updated_at,created_by and updated_by columns.


to create formfields go to FormFields in mean and fill the relavent information.



##Future plan

addition of all possible fields in formfield model.
