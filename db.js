import pg from 'pg';

const { Pool } = pg;

const pool = new Pool({
  user: 'postgres',
  host: 'localhost',
  database: 'sistema_agendamento',
  password: '2601',
  port: 5432,
});

export default pool;