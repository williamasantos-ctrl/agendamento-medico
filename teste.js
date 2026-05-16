import pool from './db.js';

async function testarConexao() {
  try {
    const resposta = await pool.query('SELECT NOW()');
    console.log('Banco conectado!');
    console.log(resposta.rows);
  } catch (erro) {
    console.error('Erro:', erro);
  }
}

testarConexao();