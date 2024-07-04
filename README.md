## 📊 Projeto financeiro

Esse projeto visa criar um sistema para pessoas que investem.

## 👩‍💻 Como executar localmente
1- Configure o seu bash para reconhecer o comando "sail" adicionando o codigo a baixo na ultima linha do seu arquivo "~/.bashrc", se não quiser reiniciar o computador para aplicar essa alteração, você pode rodar esse comando tambem no seu terminal, mas não esqueça de adicionar ele no arquivo mencionado:
```bash
    alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```

2- Inicie o projeto com docker com laravel sail

```bash
    sail up -d
```

3- Execute o VITE para compilar o front-end em tempo de desenvolvimento

```bash
    sail npm run dev
```