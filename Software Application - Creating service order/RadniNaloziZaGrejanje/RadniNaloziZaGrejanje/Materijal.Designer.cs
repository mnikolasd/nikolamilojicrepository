namespace RadniNaloziZaGrejanje
{
    partial class frmMaterijal
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            this.tbNazivMaterijala = new System.Windows.Forms.TextBox();
            this.tbCenaMaterijala = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.btnUnesi = new System.Windows.Forms.Button();
            this.btnNazad = new System.Windows.Forms.Button();
            this.dgwMaterijal = new System.Windows.Forms.DataGridView();
            this.tipMaterijalaIDDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.nazivMaterijalaDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.cenaMaterijalaDataGridViewTextBoxColumn = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.tipMaterijalaBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.grejanjeDataSet = new RadniNaloziZaGrejanje.GrejanjeDataSet();
            this.tipMaterijalaTableAdapter = new RadniNaloziZaGrejanje.GrejanjeDataSetTableAdapters.TipMaterijalaTableAdapter();
            ((System.ComponentModel.ISupportInitialize)(this.dgwMaterijal)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.tipMaterijalaBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.grejanjeDataSet)).BeginInit();
            this.SuspendLayout();
            // 
            // tbNazivMaterijala
            // 
            this.tbNazivMaterijala.Location = new System.Drawing.Point(116, 24);
            this.tbNazivMaterijala.Name = "tbNazivMaterijala";
            this.tbNazivMaterijala.Size = new System.Drawing.Size(100, 20);
            this.tbNazivMaterijala.TabIndex = 0;
            // 
            // tbCenaMaterijala
            // 
            this.tbCenaMaterijala.Location = new System.Drawing.Point(116, 62);
            this.tbCenaMaterijala.Name = "tbCenaMaterijala";
            this.tbCenaMaterijala.Size = new System.Drawing.Size(100, 20);
            this.tbCenaMaterijala.TabIndex = 1;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(21, 27);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(81, 13);
            this.label1.TabIndex = 2;
            this.label1.Text = "Naziv materijala";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(21, 65);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(79, 13);
            this.label2.TabIndex = 3;
            this.label2.Text = "Cena materijala";
            // 
            // btnUnesi
            // 
            this.btnUnesi.Location = new System.Drawing.Point(294, 22);
            this.btnUnesi.Name = "btnUnesi";
            this.btnUnesi.Size = new System.Drawing.Size(75, 23);
            this.btnUnesi.TabIndex = 4;
            this.btnUnesi.Text = "&Unesi";
            this.btnUnesi.UseVisualStyleBackColor = true;
            this.btnUnesi.Click += new System.EventHandler(this.btnUnesi_Click);
            // 
            // btnNazad
            // 
            this.btnNazad.Location = new System.Drawing.Point(294, 59);
            this.btnNazad.Name = "btnNazad";
            this.btnNazad.Size = new System.Drawing.Size(75, 23);
            this.btnNazad.TabIndex = 5;
            this.btnNazad.Text = "&Nazad";
            this.btnNazad.UseVisualStyleBackColor = true;
            this.btnNazad.Click += new System.EventHandler(this.btnNazad_Click);
            // 
            // dgwMaterijal
            // 
            this.dgwMaterijal.AutoGenerateColumns = false;
            this.dgwMaterijal.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgwMaterijal.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.tipMaterijalaIDDataGridViewTextBoxColumn,
            this.nazivMaterijalaDataGridViewTextBoxColumn,
            this.cenaMaterijalaDataGridViewTextBoxColumn});
            this.dgwMaterijal.DataSource = this.tipMaterijalaBindingSource;
            this.dgwMaterijal.Location = new System.Drawing.Point(24, 107);
            this.dgwMaterijal.Name = "dgwMaterijal";
            this.dgwMaterijal.Size = new System.Drawing.Size(345, 275);
            this.dgwMaterijal.TabIndex = 6;
            this.dgwMaterijal.CellClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dgwMaterijal_CellClick);
            // 
            // tipMaterijalaIDDataGridViewTextBoxColumn
            // 
            this.tipMaterijalaIDDataGridViewTextBoxColumn.DataPropertyName = "TipMaterijalaID";
            this.tipMaterijalaIDDataGridViewTextBoxColumn.HeaderText = "ID";
            this.tipMaterijalaIDDataGridViewTextBoxColumn.Name = "tipMaterijalaIDDataGridViewTextBoxColumn";
            this.tipMaterijalaIDDataGridViewTextBoxColumn.ReadOnly = true;
            // 
            // nazivMaterijalaDataGridViewTextBoxColumn
            // 
            this.nazivMaterijalaDataGridViewTextBoxColumn.DataPropertyName = "NazivMaterijala";
            this.nazivMaterijalaDataGridViewTextBoxColumn.HeaderText = "Naziv";
            this.nazivMaterijalaDataGridViewTextBoxColumn.Name = "nazivMaterijalaDataGridViewTextBoxColumn";
            // 
            // cenaMaterijalaDataGridViewTextBoxColumn
            // 
            this.cenaMaterijalaDataGridViewTextBoxColumn.DataPropertyName = "CenaMaterijala";
            this.cenaMaterijalaDataGridViewTextBoxColumn.HeaderText = "Cena";
            this.cenaMaterijalaDataGridViewTextBoxColumn.Name = "cenaMaterijalaDataGridViewTextBoxColumn";
            // 
            // tipMaterijalaBindingSource
            // 
            this.tipMaterijalaBindingSource.DataMember = "TipMaterijala";
            this.tipMaterijalaBindingSource.DataSource = this.grejanjeDataSet;
            // 
            // grejanjeDataSet
            // 
            this.grejanjeDataSet.DataSetName = "GrejanjeDataSet";
            this.grejanjeDataSet.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // tipMaterijalaTableAdapter
            // 
            this.tipMaterijalaTableAdapter.ClearBeforeFill = true;
            // 
            // frmMaterijal
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(406, 401);
            this.Controls.Add(this.dgwMaterijal);
            this.Controls.Add(this.btnNazad);
            this.Controls.Add(this.btnUnesi);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.tbCenaMaterijala);
            this.Controls.Add(this.tbNazivMaterijala);
            this.Name = "frmMaterijal";
            this.Text = "Materijal";
            this.Load += new System.EventHandler(this.frmMaterijal_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgwMaterijal)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.tipMaterijalaBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.grejanjeDataSet)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox tbNazivMaterijala;
        private System.Windows.Forms.TextBox tbCenaMaterijala;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Button btnUnesi;
        private System.Windows.Forms.Button btnNazad;
        private System.Windows.Forms.DataGridView dgwMaterijal;
        private GrejanjeDataSet grejanjeDataSet;
        private System.Windows.Forms.BindingSource tipMaterijalaBindingSource;
        private GrejanjeDataSetTableAdapters.TipMaterijalaTableAdapter tipMaterijalaTableAdapter;
        private System.Windows.Forms.DataGridViewTextBoxColumn tipMaterijalaIDDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn nazivMaterijalaDataGridViewTextBoxColumn;
        private System.Windows.Forms.DataGridViewTextBoxColumn cenaMaterijalaDataGridViewTextBoxColumn;
    }
}