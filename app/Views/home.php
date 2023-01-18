
<div>
    <h1 class="titulo">BRASA</h1>
    <h2 class="subtitulo">Novo projeto CodeIgniter 4</h2>
</div>

<article>
    <section>
        <h4>> Database</h4>
        <p>
            Crie um novo banco de dados e altere o campo <strong>database.default.database</strong> no arquivo <strong>.env</strong> 
            que está na raiz do projeto para o nome do seu novo banco de dados. Depois, no terminal da raiz do projeto, 
            você pode utilizar os comandos <tt>php spark migrate</tt>&nbsp;para criar uma tabela de usuarios e <tt>php spark db:seed UsuariosSeeder</tt>&nbsp;
            para popular a tabela com dois usuarios predefinidos (usuario1 e usuario2, com senha 1234 para ambos).
        </p>
    </section>
    <section>
        <h4>> Login</h4>
        <p>
            Com o banco de dados populado, você pode acessar a página de <a href="<?=base_url('/login')?>">login</a> e utilizar o usuario predefinido. 
            Se tudo foi feito corretamente, você deverá ver uma simples página de área restrita com um borão para logout.
        </p>
    </section>
    <section>
        <h4>> Lembre-se</h4>
        <p>
            A documentação sempre será sua melhor amiga. Confira a documentação oficial do CodeIgniter4 <a href="https://codeigniter.com/user_guide/intro/index.html">aqui</a> e a breve documentação deste projeto no repositório do github <a href="https://github/brunoggdev/brasa">aqui</a>.
        </p>
    </section>
</article>
