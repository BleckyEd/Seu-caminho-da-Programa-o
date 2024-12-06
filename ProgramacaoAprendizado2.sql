drop database If exists ProgramaEstudo;
create database ProgramaEstudo;
use ProgramaEstudo;




create table usuario(
    nome varchar(50)  primary key not null,
    senha varchar(10) not null

);


create table material(
	id varchar(5) not null,
    nome varchar(100) not null,
    linguagem varchar(50),
    conteudo varchar(50),
    	link varchar(1000) not null,
    area varchar(50),
    primary key(id)
);
create table usuario_material(
	nome_us varchar(50) not null,
    id_mat varchar(5) not null,
    primary key(id_mat,nome_us),
        foreign key(id_mat)  references material(id),
        foreign key(nome_us)  references usuario(nome)
);
create table videoaula(
        mat_estudo_id VARCHAR(5) not null,
    link varchar(200) not null,
    primary key(mat_estudo_id),
        foreign key(mat_estudo_id)  references material(id)
);
create table site(
        mat_estudo_id VARCHAR(5) not null,
    link varchar(200) not null,
    dominio varchar(45),
    primary key(mat_estudo_id),
    foreign key(mat_estudo_id)  references material(id)
);
create table livro(
        mat_estudo_id VARCHAR(5) not null,
    editora varchar(100) not null,
    volume varchar(100) not null,
    primary key(mat_estudo_id),
    foreign key(mat_estudo_id)  references material(id)
);

#dudu
#material_estudo
insert into material(id,nome,linguagem,conteudo,area,link) values
        #Fonte "https://www.w3schools.com/python/default.asp"
        ("ST01"," Tutoriais Python W3Schools","Python",'','','https://www.w3schools.com/python/default.asp'),
    #Fonte "https://www.w3schools.io/languages/rust-tutorials/"
    ("ST02","Tutoriais Rust W3Schools.io","Rust",'','','https://www.w3schools.io/languages/rust-tutorials/'),
    #Fonte "https://www.w3schools.in/cplusplus/tutorials/"
    ("ST03","Tutoriais C++ W3Schools.in",'C++','','','https://www.w3schools.in/cplusplus/tutorials/'),
    #Fonte "https://www.amazon.com.br/dp/6555208260?tag=acesso2-20&linkCode=osi&th=1&psc=1&keywords=livros%20computacao%20grafica"
    ("LV01","Computação Gráfica: Teoria e Prática: Geração de Imagens",'','','Computação Gráfica','https://www.amazon.com.br/dp/6555208260?tag=acesso2-20&linkCode=osi&th=1&psc=1&keywords=livros%20computacao%20grafica'),
    #Fonte https://www.youtube.com/watch?v=dp0zB4n3MUs
    ("VD01","O QUE SÃO FRAMEWORKS E BIBLIOTECAS? QUAIS AS DIFERENÇAS?",'' ,"Bibliotecas e Frameworks",'','https://www.youtube.com/watch?v=dp0zB4n3MUs'),
    #Fonte https://www.atlassian.com/br/agile/scrum
    ("ST04","Metodo Scrum",'','Metodologias de Desenvolvimento','','https://www.atlassian.com/br/agile/scrum'),
    
    ("ST05","JavaScipt Tutorial","JavaScript",'','','https://www.w3schools.com/js/');
                                
insert into site(dominio,link,mat_estudo_id) values 
        ("w3schools.com","https://www.w3schools.com/python/default.asp","ST01"),
    ("w3schools.io","https://www.w3schools.io/languages/rust-tutorials/","ST02"),
    ("w3schools.in","https://www.w3schools.in/cplusplus/tutorials/","ST03"),
    ("w3schools.com","https://www.w3schools.com/js/","ST05"),
    ("atlassian.com","https://www.atlassian.com/br/agile/scrum","ST04");
insert into livro(editora,volume,mat_estudo_id) values 
        ("Alta Books","1","LV01");
insert into videoaula(link,mat_estudo_id) values 
        ("https://www.youtube.com/watch?v=dp0zB4n3MUs","VD01");

insert into usuario(nome,senha) values
	("eu","eu"),
    ("Lop","011"),
    ("Nahi","610");

#RUST (https://doc.rust-lang.org/rust-by-example/) PYTHON (https://www.python.org/doc/essays/blurb/) C++ (https://www.w3schools.com/cpp/cpp_intro.asp)

-- insert into area(id, nome, descricao) values
--         (01, "Computação Gráfica", "A computação gráfica é a área da ciência da computação que se dedica à criação, manipulação e análise de imagens digitais."),
--         (02, "Web development", "Web development é a área da ciência da computação que se dedica à criação de sites        para a internet."),
--         (03, "Software development", "Software development é a área da ciência da computação que se dedica à criação de programas.");



-- insert into conteudo(id,nome,descricao) values
--         ('01','Representação de Imagens','A base da computação gráfica reside na habilidade de traduzir 
-- ideias em imagens digitais. Através de técnicas como modelagem 2D e 3D, mapeamento de texturas e iluminação, criamos 
-- imagens realistas e atraentes.') , 
--         ('02' , 'Bibliotecas e Frameworks' , 'utilize bibliotecas e frameworks populares como 
-- jQuery, React, Angular e Vue.js para otimizar o desenvolvimento web, reutilizar código e ter acesso a funcionalidades 
-- prontas, como animações, gerenciamento de estado e interfaces complexas.') , 
--         ('03' , 'Metodologias de Desenvolvimento' , 
-- 'Domine diferentes metodologias de desenvolvimento de software, como Agile, Scrum e Waterfall, para organizar o processo 
-- de criação de software, desde a concepção até o lançamento e manutenção.') ;

/*
01 https://www.pucsp.br/~jarakaki/cgpi/00_CG.pdf
02 https://www.dio.me/articles/conceituando-frameworks-libraries-dependencias
03 https://www.monitoratec.com.br/blog/metodologias-de-desenvolvimento-de-software/
*/

CREATE USER 'user5'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON ProgramaEstudo.* TO 'user5'@'localhost';
