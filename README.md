# Amigo Secreto API

Este projeto é uma API para gerenciar grupos e participantes em um sorteio de amigo secreto, com funcionalidades para criar grupos, adicionar participantes e gerar matches.

---

## **Endpoints**

### **Criar Grupo**
- Método: `POST`
- Endpoint: `/api/v1/group`
- Corpo da Requisição:
    - `group_name` (string): Nome do grupo.

### **Adicionar Participante no Grupo**
- Método: `POST`
- Endpoint: `/api/v1/group/addUser`
- Corpo da Requisição:
    - `user_id` (inteiro): ID do usuário.
    - `group_id` (inteiro): ID do grupo.

### **Adicionar Usuário no Sistema**
- Método: `POST`
- Endpoint: `/api/v1/user`
- Corpo da Requisição:
    - `user_name` (string): Nome do usuário.

### **Gerar Matches**
- Método: `POST`
- Endpoint: `/api/v1/group/match`
- Sem necessidade de corpo na requisição.

### **Saber Quem Você Deve Presentear**
- Método: `GET`
- Endpoint: `/api/v1/match/{user_id}`
- Descrição: Retorna quem deve ser presenteado pelo ID do usuário.

---

## **Tabelas**

### Tabela `groups`
- `id`: Chave primária (PK).
- `name`: Nome do grupo (string).
- `matched`: Indica se os matches foram gerados (boolean).
- `timestamp`: Timestamp gerado pelo Laravel.

### Tabela `users`
- `id`: Chave primária (PK).
- `name`: Nome do usuário (string).
- `group_id`: Chave estrangeira (FK, null) para a tabela `group`.
- `friend_id`: Chave estrangeira (FK, null) para outro `user`.
- `timestamp`: Timestamp gerado pelo Laravel.

---

## **Lógica do Match**

1. Cada participante será designado para presentear outro amigo.
2. Regras para o sorteio:
    - O amigo não pode ser o próprio participante.
    - O amigo não pode já ter sido selecionado por outra pessoa.
    - A relação entre amigos não pode ser cíclica (exemplo: se `user_1` deve presentear `user_2`, `user_2` não pode presentear `user_1`).
    - O amigo deve pertencer ao mesmo grupo que o participante.
    - Não é possivel gerar dois matches para o mesmo grupo.

---
