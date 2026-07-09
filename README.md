# 📦 Sistema de Reservas e Empréstimos

Projeto da **Fábrica de Software** (Scrum) — Projeto A.
Solução completa **Web (PHP) + Mobile (Android) + Banco (MySQL)** integrada por **API JSON**.

Usuários reservam recursos da escola (projetor, sala, equipamento) por **data** e **turno**
(manhã/tarde/noite). O **admin** cadastra recursos, categorias e setores; o **usuário** faz
reservas e vê o histórico. A reserva é **automática** (sem aprovação).

## 📁 Estrutura
```
Projeto-davi/
├── sql/      → Scripts do banco (copiar/colar no phpMyAdmin)
├── web/      → Site em PHP (vai em C:\xampp\htdocs\reservas)
├── mobile/   → App Android (abrir no Android Studio)
└── docs/     → Documentação: relatório, kanban e diagramas
```

Resumo rápido:
1. XAMPP: ligar Apache + MySQL.
2. phpMyAdmin: executar `sql/01_estrutura.sql` e depois `sql/02_dados_iniciais.sql`
   (esse script já cria o usuário admin de teste, com a senha pronta).
3. Copiar `web/` para `C:\xampp\htdocs\reservas`.
4. Entrar em `http://localhost/reservas/login.php` → `admin@escola.com` / `123456`.
   (o `instalar.php` é opcional — só precisa se quiser recriar/atualizar os usuários manualmente).
5. Não tem conta? Use o link **"Cadastre-se"** na tela de login (`cadastro.php`) para criar um
   usuário comum (tipo `user`) sem precisar de acesso ao banco.
6. Abrir `mobile/ReservasApp` no Android Studio, ajustar `ApiConfig.java` e rodar.

## 📚 Documentação
- [DER — Banco de Dados](docs/DER.md)
- [Diagrama de Classes](docs/diagrama_classes.md)
- [Diagrama de Casos de Uso](docs/diagrama_casos_de_uso.md)

## 🔑 Logins de teste
Já vêm prontos no `sql/02_dados_iniciais.sql` (senha já criptografada), não precisa criar nada:

| Perfil | E-mail | Senha |
|---|---|---|
| Admin | admin@escola.com | 123456 |
| Usuário | aluno@escola.com | 123456 |

Quer criar mais usuários? Na tela de login (`login.php`) tem o link **"Cadastre-se"**, que abre
`cadastro.php` — qualquer pessoa pode criar a própria conta ali, mas o cadastro público sempre
cria contas do tipo **usuário comum** (nunca admin, por segurança).
